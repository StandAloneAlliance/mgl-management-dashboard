import requests

url = 'https://mglconsulting.esafad.it/Utenti/login'
data = {
    '_method': 'POST',
    'data[Utente][email]': 'grazia.mgconsulting@tiscali.it',
    'data[Utente][password]': 'grazia1976'
}

response = requests.post(url, data=data, verify=False)
# Check if the request was successful
if response.status_code == 200:
    # Print the HTML content of the response
    print(response.text)

    # Open the file in write mode
    with open('./input.html', 'w') as file:
        # Redirect the print statement to write to the file
        print(response.text, file=file)

else:
    # Print the status code if the request failed
    print('Request failed with status code:', response.status_code)
