from flask import Flask, render_template, request, jsonify
import pickle
from sklearn.tree import DecisionTreeClassifier
from sklearn.feature_extraction.text import CountVectorizer
app = Flask(__name__)

model = DecisionTreeClassifier()
vectorizer = CountVectorizer()

with open('finalized_models_withstemmed.sav', 'rb') as file:
    model = pickle.load(file)

with open('word_vectorizer.sav', 'rb') as file:
    vectorizer = pickle.load(file)


@app.route('/api/predict', methods=['POST'])

def predict():
   
    # Retrieve the input data from the request
    data = request.get_json()
    X = vectorizer.transform([data["string"]])
    
    # Use the loaded model to make predictions
    predictions = model.predict(X)
    print(predictions)

    # Return the predictions as a JSON response
    return jsonify(predictions.tolist())

if __name__ == '__main__':
    app.run()