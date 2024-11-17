from http.server import BaseHTTPRequestHandler, HTTPServer
import json
import face_recognition as fr
import numpy as np
import pandas as pd
import os
from io import BytesIO
from PIL import Image
import base64
# Get current working directory
# cwd = os.getcwd()
# print("Current Working Directory:", cwd)


# with open("python/face/encodings.json", "r") as f:
#     encoding_list = json.load(f)
#     for name, data in encoding_list.items():
#         print(name, data)


        # image_bytes = base64.b64decode(bytes(str(data), 'utf-8'))
        # pil_image = Image.open(BytesIO(image_bytes)).convert("RGB")  # Ensure RGB format
        # numpy_image = np.array(pil_image)
        # print(numpy_image)


print('init')
face_encodings = []
names = []
save_encodings = {}
with open("python/face/encodings.json", "r") as f:
    encoding_list = json.load(f)

for name, data in encoding_list.items():
    # print(name, data)

    save_encodings[name] = data
    # image_bytes = base64.b64decode(bytes(str(data), 'utf-8'))
    # pil_image = Image.open(BytesIO(image_bytes)).convert("RGB")  # Ensure RGB format
    # numpy_image = np.array(pil_image)
    # print(numpy_image)
    names.append(name)
    face_encodings.append(data)


# print(len(face_encodings))


class MyRequestHandler(BaseHTTPRequestHandler):



    # Handle GET requests
    def do_GET(self):
        # Send a 200 OK response
        self.send_response(200) 
        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)
        
        # print(post_data)
        image_bytes = base64.b64decode(json.loads(post_data).get('image'))
        pil_image = Image.open(BytesIO(image_bytes)).convert("RGB")
        # pil_image.save("debug_image.jpg")
        # print("Image saved as debug_image.jpg for inspection.")

        numpy_image = np.array(pil_image)
        # print(numpy_image)

        encodings = fr.face_encodings(numpy_image)
        if len(encodings) > 0:
            unknown_encoding = encodings[0]
            results = fr.compare_faces(face_encodings, unknown_encoding)
            print(results)
            self.send_header('Content-type', 'application/json')
            self.end_headers()
            print(names[results.index(True)])
            try:
                val = { 'name' : names[results.index(True)], 'id' : results.index(True) + 1}
                self.wfile.write(json.dumps(val).encode('utf-8'))
            except:
                self.wfile.write(json.dumps({'name' : '', 'id' : '0'}).encode('utf-8'))
        else:
            self.send_header('Content-type', 'application/json')
            self.end_headers()
            self.wfile.write(json.dumps({'name' : '', 'id' : '0'}).encode('utf-8'))
            

        # Parse query parameters (if any)
        # path = self.path
        # if '?' in path:
        #     query_string = path.split('?', 1)[1]
        #     params = dict(param.split('=') for param in query_string.split('&'))
        # else:
        #     params = {}

        

        # self.wfile.write(json.dumps(response).encode('utf-8'))

PORT = 8081

with HTTPServer(('', PORT), MyRequestHandler) as server:
    print(f'Server running on port {PORT}...')
    server.serve_forever()