# sgwzha23 Wuwei Zhang
# update the current data include movie and review
# Data Importer using TMDB API, then connect to sql server

import pymysql
from tmdbv3api import TMDb, Movie, Genre, Person
from tmdbv3api.exceptions import TMDbException

import DataHandler.tmdb_data as tm

tmdb = TMDb()
tmdb.language = 'en'
tmdb.debug = True
tmdb.api_key = '0588db91761ddf6950996157cef0bee0'  # private key please do not share


def insert_genre(genre):
    sql = 'INSERT INTO genre (genre_id, genre_name) VALUES (%s,%s)'
    cur.execute(sql, (genre.genre_id, genre.genre_name))


def insert_movie(movie):
    sql = 'INSERT IGNORE INTO movie (movie_id, tmdb_id, imdb_id, title, original_title, collection, languages, ' \
          'release_date, overview, vote_count, vote_average, country, runtime, poster_path)' \
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


def popular():
    for page in range(120, 500):
        m = movie.popular(page)
        for i in m:
            if i['id'] < 460000: break
            k = i['id']
            step = 1
            movie_list = tm.import_movie(k, k + step)  # 460000
            for j in movie_list:
                j.vote_count = 100
                insert_movie(j)

            mg_list = tm.import_movie_genre(k, k + step)
            for j in mg_list:
                insert_movie_genre(j)

            cast_list = tm.import_cast(k, k + step)
            for j in cast_list:
                insert_cast(j)


connection = pymysql.connect(host='rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com',
                             user='team39',
                             password='Comp20839',
                             db='kiwi_test')
cur = connection.cursor()
cur.execute("USE kiwi_test")

tmdb = TMDb()
movie = Movie()

for page in range(1, 500):
    m = movie.top_rated(page)
    for i in m:
        if i['id'] < 460000: break
        k = i['id']
        step = 1
        movie_list = tm.import_movie(k, k + step)  # 460000
        for j in movie_list:
            j.vote_count = 75
            insert_movie(j)

        mg_list = tm.import_movie_genre(k, k + step)
        for j in mg_list:
            insert_movie_genre(j)

        cast_list = tm.import_cast(k, k + step)
        for j in cast_list:
            insert_cast(j)

connection.commit()
connection.close()
cur.close()


