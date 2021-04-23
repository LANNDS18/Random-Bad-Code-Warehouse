# sgwzha23 Wuwei Zhang
# content based recommend

import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel
import pickle
import numpy as np
import sys
import json


def process_data():
    df2 = pd.read_csv('tmdb_5000_movies.csv')
    #df2 = pd.read_csv('content-based.csv',names=['id','title','genres','overview'])
    # read data
    # Define a TF-IDF Vectorizer Object. Remove all english stop words such as 'the', 'a'
    tfidf = TfidfVectorizer(stop_words='english')

    # Replace NaN with an empty string
    df2['overview'] = df2['overview'].fillna('')
    tfidf_matrix = tfidf.fit_transform(df2['overview'])
    # Construct the required TF-IDF matrix by fitting and transforming the data
    t3 = tfidf.fit_transform(df2['genres'].fillna(''))
    cos2 = linear_kernel(t3, t3)/2
    t4 = tfidf.fit_transform(df2['title'].fillna(''))
    cos2 = (linear_kernel(t4,t4)/6)/2
    # Compute the cosine similarity matrix
    cosine_sim = linear_kernel(tfidf_matrix, tfidf_matrix)
    # Construct a reverse map of indices and movie titles
    indices = pd.Series(df2.index, index=df2['id']).drop_duplicates()
    cos = np.array(cosine_sim)
    matrix = cos.argsort()[:, ::-1]
    matrix = matrix[:, 1:21]
    # save models
    similar_matrix = open('similar_matrix.pkl', 'wb')
    reserve_map = open('reserve.plk', 'wb')
    pickle.dump(matrix, similar_matrix)
    pickle.dump(indices, reserve_map)


# Function that takes in movie title as input and outputs most similar movies
def get_recommendation(movie_id):
    df2 = pd.read_csv('tmdb_5000_movies.csv')
    # read data
    id_list = list(df2['id'])
    if movie_id in id_list:
        try:
            similar_matrix = open('similar_matrix.pkl', 'rb')
            reserve_map = open('reserve.plk', 'rb')
            matrix = pickle.load(similar_matrix)
            indices = pickle.load(reserve_map)
            df = pd.DataFrame(indices)
            # Get the index of the movie that matches the title
            idx = indices[movie_id]
            a = matrix[idx]
            # Return the top 10 most similar movies
            return list(df2['id'].iloc[a])
        except KeyError:
            return None
    else:
        return None

process_data()
# print(get_recommendation(242))
