## Laravel & Vue JS Polling System

# Installation

## Create .env file
Copy .env.example to .env

## Generate Key
Run `php artisan key:generate`

## Install dependencies
Run `composer install`

For testing purpose no need to install npm dependencies or run `npm run build` since the project is compiled already.
However, to check code changes install the dependencies.
Run `npm install` and `npm run dev` or `npm run build`

## Run migrations
1. Create your database and add that to the `.env` file
2. Run `php artisan migrate` to create the needed tables

## Run the application
Run `php artisan serve`

## Run web sockets for realtime updates
Run `php artisan reverb:start`


# Running the application
1. Create an account by clicking the register link
2. Login to the app. (if new register you will logged in automatically)


## Add polls, questions and choices
1. Click `Create Poll` to create a new poll
2. Go to polls page `http://localhost:8000/polls` to see the created poll
3. Click `Questions` button to go to questions page
4. Click `Create Question` to create a new question. You can create as many questions as possible
5. On any question click `Choices` to go to choices page.
6. Click `Create Choice` to add a new choice. You can add as many choices as needed

### Voting to a poll
1. Go to polls page `http://localhost:8000/polls` to see the created poll
2. On whichever poll click `Vote` so as to vote in that poll.
3. You will see a list of questions and the available choices

### See votes
1. On the poll that you voted click `Questions` and you are directed to the questions page
2. Click `See Votes` button to see the votes for each question


### View Polls
Go to polls section to see all polls `http://localhost:8000/polls`.
- Each poll has several buttons mainly:
    - Questions - To view all questions within that poll
    - Vote - To make a new vote 
    - Edit - To update the poll
    - Delete - To delete the poll


### Questions sections
- The questions sections has several buttons mainly:
    - See votes - This will show the realtime votes for the question with the number of users who selected a certain choice.
    - Choices - Adds new choices to the question
    - Edit - To update the question
    - Delete - To delete the question


## Realtime votes update
1. While on the votes page open another tab or another browser.
2. Login and navigate to the voting page and make a vote.
3. The total number of votes should update automatically.
