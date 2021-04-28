# sgwzha23 Wuwei Zhang
# update the current data include movie and review
# Data Importer using TMDB API, then connect to sql server

import pymysql
import pandas
import pickle
import DataHandler.tmdb_data as tm
import random
import csv

df = pandas.read_csv('tmdb_5000_movies.csv')
id_list = df['id']
score_list = df['vote_average']
connection = pymysql.connect(host='rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com',
                             user='team39',
                             password='Comp20839',
                             db='kiwi_test')
cur = connection.cursor()
cur.execute("USE kiwi_test")


def csv_content_recommend():
    sql = 'SELECT m.movie_id,m.title, GROUP_CONCAT(mg.genre_id) as genres, overview FROM movie m,moviegenre mg ' \
          'where m.movie_id = mg.movie_id  AND m.release_date > %s ' \
          'AND m.vote_average > 0 AND m.overview is NOT null and m.poster_path is not null ' \
          'GROUP BY movie_id;'
    cur.execute(sql, '1980-01-01')
    data = cur.fetchall()
    with open('content-based.csv', 'w', newline='', encoding='utf-8') as f:
        a = csv.writer(f, delimiter=',')
        a.writerows(data)


def insert_genre(genre):
    sql = 'INSERT INTO genre (genre_id, genre_name) VALUES (%s,%s)'
    cur.execute(sql, (genre.genre_id, genre.genre_name))


def insert_movie(movie):
    sql = 'INSERT INTO movie (movie_id, tmdb_id, imdb_id, title, original_title, collection, languages, release_date, ' \
          'overview, vote_count, vote_average, country, runtime, poster_path)' \
          'VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)'
    cur.execute(sql, (movie.movie_id, movie.tmdb_id, movie.imdb_id, movie.title, movie.original_title, movie.collection,
                      movie.language, movie.release_date, movie.overview, movie.vote_count, movie.vote_average,
                      movie.country, movie.runtime, movie.poster_path))


def insert_actor(actor):
    sql = 'INSERT INTO actor (actor_id, tmdb_id, imdb_id, name, biography, profile_path, gender, date_birth)' \
          'VALUES (%s,%s,%s,%s,%s,%s,%s,%s)'
    cur.execute(sql, (actor.actor_id, actor.tmdb_id, actor.imdb_id, actor.name, actor.biography, actor.profile_path,
                      actor.gender, actor.date_birth))


def insert_movie_genre(mg):
    sql = 'INSERT ignore INTO moviegenre (movie_id, genre_id)' \
          'VALUES (%s,%s)'
    cur.execute(sql, (mg.movie_id, mg.genre_id))


def insert_cast(cast):
    try:
        sql = 'INSERT INTO cast (movie_id, actor_id, identity) VALUES (%s,%s,%s)'
        cur.execute(sql, (cast.movie_id, cast.actor_id, cast.identity))
    except pymysql.err.IntegrityError:
        pass


def update_score(ids, scores):
    for i in range(len(ids)):
        sql = 'UPDATE movie set vote_average=%s where movie_id=%s'
        cur.execute(sql, (scores[i], ids[i]))
        sql = 'UPDATE movie set vote_count=%s where movie_id=%s'
        cur.execute(sql, (50, ids[i]))


def add_review():
    number_test = 50
    while True:
        count_sql = 'select count(*) from user where email like %s'
        cur.execute(count_sql, 'test_user%@test.test')
        count = cur.fetchall()[0][0]
        if count < number_test:
            for i in range(count, number_test):
                add_user_sql = 'insert into user(nickname,email,gender,password ) ' \
                               'values (%s,%s,%s,%s)'
                name = 'test_user' + str(i)
                mail = name + '@test.test'
                gender = 'Male' if i % 2 == 0 else 'Female'
                password = name + str(i)
                cur.execute(add_user_sql, (name, mail, gender, password))
        sql_userid = 'select user_id from user where email like %s'
        cur.execute(sql_userid, 'test_user%@test.test')
        uid_list = list(cur.fetchall())
        mid_list = pickle.load(open('id.plk', 'rb'))
        for mid in mid_list:
            random.shuffle(uid_list)
            for uid in range(len(uid_list)):
                review = tm.import_review(mid, uid)
                if review is None:
                    continue
                else:
                    print(review)
                    rating = 0 if review['author_details']['rating'] is None else float(review['author_details']['rating'])
                    content = review['content']
                    if len(content) > 10000: continue
                    sql = 'insert into review(movie_id, user_id, rating, content) ' \
                          'values (%s,%s,%s,%s)'
                    cur.execute(sql, (mid, uid_list[uid], rating, content))
                    '''# select count(distinct content) from review;
                    # select count(*) from review;
                    # delete from review where review_id not in 
                    # (select * from (select min(review_id) from review group by content having count(review_id)>1) as r) 
                    #  and content 
                    # in (select * from(select content from review group by content having count(*) > 1) as c);
'''
        break


def insert():
    k1 = 450000
    k5 = 460000
    step = 5000
    # k7 = 393000

    for k in range(k1, k5, step):
        actor_list = tm.import_actor(k, k+step)  # finish 1-20000
        for i in actor_list:
            insert_actor(i)

        movie_list = tm.import_movie(k, k + step)
        for i in movie_list:
            insert_movie(i)

        mg_list = tm.import_movie_genre(k, k + step)
        for i in mg_list:
            insert_movie_genre(i)

        cast_list = tm.import_cast(k, k + step)
        for i in cast_list:
            insert_cast(i)

    '''

    genre_list = tm.import_genre()
    for i in genre_list:
        insert_genre(i)

    '''
'''
# ensure the index in pickle
tm5000 = pickle.load(open('id.plk', 'rb'))
res = []
all = []
with open('movie_id.csv','r') as f:
    for l in f.readlines():
        l = l.strip('\n')
        all.append(l)
count = 0
for i in tm5000:
    if str(i) not in all:
        m = tm.import_movie(i, i+1)
        if len(m) == 0: continue
        insert_movie(m[0])
'''
connection.commit()
connection.close()
cur.close()
