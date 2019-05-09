import requests
import json
from os import path

def load_requests(source_url, sink_path):
    r = requests.get(source_url, stream=True)
    if r.status_code == 200:
        with open(sink_path, 'wb') as f:
            for chunk in r:
                f.write(chunk)
            f.close()

def build_img_path(company_name):
    first = "img/"
    last = ".jpg"
    company_name = company_name.lower()
    str = company_name.replace(" ", "_")
    return first + str + last

if __name__ == "__main__":

    with open('reduced.json') as json_file:
        data = json.load(json_file)
        for entry in data:
            load_requests(entry['imageUri'], build_img_path(entry['name']))
