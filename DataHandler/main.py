# sgwzha23 Wuwei
# Data Importer using TMDB API, then connect to sql server
import csv

import DataHandler.tmdb_data as tm
import pymysql

connection = pymysql.connect(host='rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com',
                             user='team39',
                             password='Comp20839',
                             db='kiwi_test')

cur = connection.cursor()
cur.execute("USE kiwi_test")


def csv_content_recommend():
    sql = 'SELECT m.movie_id,m.title, GROUP_CONCAT(mg.genre_id) as genres, overview FROM movie m,moviegenre mg ' \
          'where m.movie_id = mg.movie_id  AND m.release_date > "1980-01-01" ' \
          'AND m.vote_average > 0 AND m.overview is NOT null and m.poster_path is not null ' \
          'GROUP BY movie_id;'
    cur.execute(sql)
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


def insert():

    k1 = 350000
    k5 = 393000
    step = 1000
   # k6 = 390000
    #k7 = 393000

    for k in range(k1, k5, step):
        actor_list = tm.import_actor(k, k+step)  # finish 1-20000
        for i in actor_list:
            insert_actor(i)

    '''
        movie_list = tm.import_movie(k, k + step)
        for i in movie_list:
            insert_movie(i)                         #   390000

        mg_list = tm.import_movie_genre(k, k + step)
        for i in mg_list:
            insert_movie_genre(i)

        cast_list = tm.import_cast(k, k + step)
        for i in cast_list:
            insert_cast(i)



    genre_list = tm.import_genre()
    for i in genre_list:
        insert_genre(i)

    '''

insert()

connection.commit()
connection.close()
cur.close()