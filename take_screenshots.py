import time
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument("--headless")
options.add_argument("--no-sandbox")
options.add_argument("--disable-dev-shm-usage")
options.add_argument("--window-size=1400,2400")

service = Service("/usr/bin/chromedriver")
driver = webdriver.Chrome(service=service, options=options)

try:
    print("Capturing UA Homepage...")
    driver.get("http://localhost:8000/lang/uk")
    time.sleep(1)
    driver.get("http://localhost:8000/")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-home-ua.png")

    print("Capturing EN Homepage...")
    driver.get("http://localhost:8000/lang/en")
    time.sleep(1)
    driver.get("http://localhost:8000/")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-home-en.png")

    print("Capturing EN News index...")
    driver.get("http://localhost:8000/news")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-news-en.png")

    print("Capturing UA News index...")
    driver.get("http://localhost:8000/lang/uk")
    time.sleep(1)
    driver.get("http://localhost:8000/news")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-news-ua.png")

    print("Capturing UA Activities...")
    driver.get("http://localhost:8000/activities")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-activities-ua.png")

    print("Capturing UA Opportunities...")
    driver.get("http://localhost:8000/opportunities")
    time.sleep(2)
    driver.save_screenshot("/home/user/preview-opportunities-ua.png")

    print("Screenshots saved successfully!")

finally:
    driver.quit()
