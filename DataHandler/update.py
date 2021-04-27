import pymysql
import pandas
import DataHandler.tmdb_data as tm


df = pandas.read_csv('tmdb_5000_movies.csv')
id_list = df['id']
score_list = df['vote_average']


def update_score(ids, scores):
    connection = pymysql.connect(host='rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com',
                                 user='team39',
                                 password='Comp20839',
                                 db='kiwi_test')
    cur = connection.cursor()
    cur.execute("USE kiwi_test")
    for i in range(len(ids)):
        sql = 'UPDATE movie set vote_average=%s where movie_id=%s'
        cur.execute(sql, (scores[i], ids[i]))
        sql = 'UPDATE movie set vote_count=%s where movie_id=%s'
        cur.execute(sql, (50, ids[i]))
    connection.commit()
    connection.close()
    cur.close()


update_score(id_list, score_list)
