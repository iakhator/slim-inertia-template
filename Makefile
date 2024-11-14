# Define variables for the server and client commands
PHP_SERVER = php -S localhost:8080 -t public
VITE_SERVER = npm run dev

# Command to run both client and server
.PHONY: start client server

# Start both the PHP and Vite servers
start:
	$(PHP_SERVER) & $(VITE_SERVER)

# Start only the PHP server
server:
	$(PHP_SERVER)

# Start only the Vite client server
client:
	$(VITE_SERVER)
