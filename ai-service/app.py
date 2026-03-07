# pip install fastapi uvicorn chromadb sentence-transformers langchain
# python ingest.py
# uvicorn app:app --reload --port 8001

from fastapi import FastAPI
import chromadb
from sentence_transformers import SentenceTransformer

app = FastAPI()

model = SentenceTransformer("all-MiniLM-L6-v2")

client = chromadb.Client()
collection = client.get_collection("shop_docs")


@app.post("/ask")
async def ask_ai(data: dict):

    question = data["question"]

    q_emb = model.encode(question).tolist()

    results = collection.query(
        query_embeddings=[q_emb],
        n_results=3
    )

    context = " ".join(results["documents"][0])

    answer = f"""
    Question: {question}

    Context: {context}

    Answer: {context}
    """

    return {"answer": answer}
