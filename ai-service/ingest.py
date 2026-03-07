import chromadb
from sentence_transformers import SentenceTransformer

model = SentenceTransformer("all-MiniLM-L6-v2")

client = chromadb.Client()

collection = client.get_or_create_collection("shop_docs")

with open("data.txt") as f:
    text = f.read()

chunks = text.split("\n")

for i, chunk in enumerate(chunks):
    emb = model.encode(chunk).tolist()

    collection.add(
        documents=[chunk],
        embeddings=[emb],
        ids=[str(i)]
    )

print("Data stored in Chroma")
