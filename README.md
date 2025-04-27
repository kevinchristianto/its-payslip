# ITS Payslip Blast

## Steps
1. Clone this repo
2. Copy the `.env.example` file to `.env`
3. Fill in the .env file with your details
4. Copy the `.env.example` file to `.env` in the `laradock` folder
5. Set the `PHP_VERSION` in the `laradock/.env` file to `8.3`
6. Set the `PHP_WORKER_INSTALL_GD` in the `laradock/.env` file to `true`
7. Run `docker-compose up -d nginx mysql php-worker`
8. Make sure the `storage` directory is owned by the `laradock` user, and the rest of the directories are owned by the the host user