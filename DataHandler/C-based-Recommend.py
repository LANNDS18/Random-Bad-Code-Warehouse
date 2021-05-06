# sgwzha23 Wuwei Zhang
# content based recommend

import pandas as pd
import pymysql
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel
import pickle
import numpy as np



def process_data():
    df2 = pd.read_json('kiwi_box_5000.json')
    # read data
    # Define a TF-IDF Vectorizer Object. Remove all english stop words such as 'the', 'a'
    tfidf = TfidfVectorizer(stop_words='english')

    # Replace NaN with an empty string
    df2['overview'] = df2['overview'].fillna('')
    tfidf_matrix = tfidf.fit_transform(df2['overview'])
    # Construct the required TF-IDF matrix by fitting and transforming the data
    t3 = tfidf.fit_transform(df2['genres'].fillna(''))
    cos2 = linear_kernel(t3, t3) / 2
    t4 = tfidf.fit_transform(df2['title'].fillna(''))
    cos2 = (linear_kernel(t4, t4) / 6) / 2
    # Compute the cosine similarity matrix
    cosine_sim = linear_kernel(tfidf_matrix, tfidf_matrix)
    # Construct a reverse map of indices and movie titles
    indices = pd.Series(df2.index, index=df2['movie_id']).drop_duplicates()
    cos = np.array(cosine_sim)
    matrix = cos.argsort()[:, ::-1]
    matrix = matrix[:, 1:21]
    id_list = df2['movie_id']
    # save models
    similar_matrix = open('similar_matrix.pkl', 'wb')
    reserve_map = open('reserve.plk', 'wb')
    id_l = open('id.plk', 'wb')
    pickle.dump(matrix, similar_matrix)
    pickle.dump(indices, reserve_map)
    pickle.dump(id_list, id_l)





# Function that takes in movie title as input and outputs most similar movies
def get_recommendation(movie_id):
    id_l = open('id.plk', 'rb')
    id_list = pickle.load(id_l)
    for mid in id_list:
        if movie_id != mid:
            continue
        try:
            similar_matrix = open('similar_matrix.pkl', 'rb')
            reserve_map = open('reserve.plk', 'rb')
            matrix = pickle.load(similar_matrix)
            indices = pickle.load(reserve_map)
            # Get the index of the movie that matches the title
            idx = indices[movie_id]
            a = matrix[idx]
            # Return the top 21 most similar movies
            return list(id_list.iloc[a])
        except KeyError:
            return None
    else:
        return None


def insert_similarity():
    connection = pymysql.connect(host='rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com',
                                 user='team39',
                                 password='Comp20839',
                                 db='kiwi_test')
    cur = connection.cursor()
    count = 0
    cur.execute("USE kiwi_test")
    id_l = open('id.plk', 'rb')
    id_list = pickle.load(id_l)
    sql = 'insert ignore into moviesimilarity values (%s,%s)'
    for m_id in id_list:
        list_id = get_recommendation(m_id)
        count += 1
        if list_id == None:
            print(count)
            continue
        res = ''
        for i in range(len(list_id)):

            id = str(list_id[i])
            if i == len(list_id) - 1:
                res += id
            else:
                res += id + ','
        print(m_id, res)
        cur.execute(sql, (m_id, res))
    connection.commit()
    connection.close()
    cur.close()


insert_similarity()
# process_data()
# print(get_recommendation(242))


