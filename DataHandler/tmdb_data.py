# sgwzha23 Wuwei Zhang
# api importer, OO design

from tmdbv3api import TMDb, Movie, Genre, Person
from tmdbv3api.exceptions import TMDbException

tmdb = TMDb()
tmdb.language = 'en'
tmdb.debug = True
tmdb.api_key = '0588db91761ddf6950996157cef0bee0'  # private key please do not share


class DbMovie:
    def __init__(self, tmdb_id=None, imdb_id=None, title=None, original_title=None, collection=None, language=None,
                 release_date=None, overview=None, vote_average=None, country=None, runtime=None, poster_path=None):
        self.movie_id = tmdb_id
        self.tmdb_id = tmdb_id
        self.imdb_id = imdb_id
        self.title = title
        self.original_title = original_title
        self.collection = collection
        self.language = language
        self.release_date = release_date
        self.overview = overview
        self.vote_count = 10  # the weight of initial count
        self.vote_average = vote_average
        self.country = country
        self.runtime = runtime
        self.poster_path = poster_path


class DbGenre:
    def __init__(self, genre_id, genre_name):
        self.genre_id = genre_id
        self.genre_name = genre_name


class DbActor:
    def __init__(self, tmdb_id, imdb_id, name, biography, profile_path, gender, date_birth):
        self.actor_id = tmdb_id
        self.tmdb_id = tmdb_id
        self.imdb_id = imdb_id
        self.name = name
        self.biography = biography
        self.profile_path = profile_path
        self.gender = gender
        self.date_birth = date_birth


class DbMovieGenre:
    def __init__(self, movie_id, genre_id):
        self.movie_id = movie_id
        self.genre_id = genre_id


class DbCast:
    def __init__(self, movie_id, actor_id, identity):
        self.movie_id = movie_id
        self.actor_id = actor_id
        self.identity = identity


# return a list of movie
def import_movie(start, end):
    movies = []
    movie = Movie()
    for i in range(start, end):
        try:
            m = movie.details(i)
            tmdb_id = int(m.id)
            imdb_id = m.imdb_id
            title = m.title
            original_title = m.original_title

            collection = str(m.belongs_to_collection)  # need to re-format
            if collection != "None":
                collection = eval(collection)
                collection = collection['name']
            language = m.original_language
            release_date = m.release_date
            if release_date == '': release_date = None
            overview = m.overview
            vote_average = m.vote_average

            country_list = eval(str(m.production_countries))  # need to re-format

            country = ""
            for c in country_list:
                country = country + '[' + c['name'] + ']'

            runtime = m.runtime
            poster_path = m.poster_path
            d = DbMovie(tmdb_id, imdb_id, title, original_title, collection, language, release_date, overview,
                        vote_average, country, runtime, poster_path)
            print(d.tmdb_id, d.imdb_id, d.title, d.original_title, d.collection, d.language, d.release_date,
                  d.vote_average, d.vote_count, d.country, d.runtime, d.poster_path)
            print(d.overview)
            movies.append(d)
        except TMDbException:  # if this id is not exist
            pass
    return movies


# return a list of genre
def import_genre():
    genre_list = []
    genres = Genre().movie_list()
    for i in genres:
        genre_id = i['id']
        name = i['name']
        g = DbGenre(genre_id=genre_id, genre_name=name)
        genre_list.append(g)
        # print(g.genre_id, g.genre_name)
    return genre_list


# return a list of actor
def import_actor(start, end):
    person_list = []
    for i in range(start, end):
        try:
            p = Person().details(i)
            tmdb_id = p.id
            imdb_id = p.imdb_id
            name = p.name
            biography = p.biography
            profile_path = p.profile_path
            gender = "Other"  # 0 - Not specified 1 - Female 2 - Male 3 - no binary
            if p.gender == 2:
                gender = "Male"
            elif p.gender == 1:
                gender = "Female"
            date_birth = p.birthday
            actor = DbActor(tmdb_id, imdb_id, name, biography, profile_path, gender, date_birth)
            person_list.append(actor)
            print(actor.tmdb_id, actor.imdb_id, actor.name, actor.profile_path, actor.gender, actor.date_birth)
            # print(actor.biography)
        except TMDbException:
            pass
    return person_list


def import_cast(start, end):
    movie = Movie()
    cast_list = []
    for index in range(start, end):
        try:
            m = movie.credits(index)['cast']
            for i in m:
                try:
                    actor_id = i['id']
                    movie_id = index
                    identity = "Act: " + i['character']
                    c = DbCast(movie_id=movie_id, actor_id=actor_id, identity=identity)
                    cast_list.append(c)
                    print(movie_id, actor_id, identity)
                except TypeError:
                    pass
            k = movie.credits(index)['crew']
            for j in k:
                try:
                    actor_id = j['id']
                    movie_id = index
                    identity = "Produce: " + j['job']
                    c = DbCast(movie_id=movie_id, actor_id=actor_id, identity=identity)
                    cast_list.append(c)
                    print(movie_id, actor_id, identity)
                except TypeError:
                    pass
        except TMDbException:
            pass
    return cast_list


# return a list of movie genre
def import_movie_genre(start, end):
    mg_list = []
    movie = Movie()
    for i in range(start, end):
        try:
            genre_list = movie.details(i).genres
            for g in genre_list:
                movie_id = i
                genre_id = g['id']
                mg = DbMovieGenre(movie_id=movie_id, genre_id=genre_id)
                mg_list.append(mg)
                print(movie_id, genre_id, g['name'])
        except TMDbException:  # if this id is not exist
            pass
    return mg_list
