# EcoStay AI Backend

## Project Overview
EcoStay AI is a Homestay Booking System developed as part of the AI-Assisted Full Stack Web Development Internship. The backend is built using Node.js and Express.js and provides REST APIs for managing homestays, user registration, login, bookings, and search functionality.

## Technologies Used
- Node.js
- Express.js
- CORS
- Dotenv

## Features
- Get all homestays
- Get single homestay
- User Registration
- User Login
- Create Booking
- View Bookings
- Delete Booking
- Search Homestays

## How to Run Backend

### Install Dependencies

```bash
npm install
```

### Start Server

```bash
node server.js
```

### Open Browser

```
http://localhost:5000
```

## API Endpoints

- GET /api/homestays
- GET /api/homestays/:id
- POST /api/register
- POST /api/login
- POST /api/bookings
- GET /api/bookings
- DELETE /api/bookings/:id
- GET /api/search?location=Mussoorie