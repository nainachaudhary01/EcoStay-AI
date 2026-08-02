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

- ---

## Deployment Details

### Backend Deployment

The EcoStay AI backend has been deployed using the Render cloud platform.

**Deployment Platform:** Render

**Backend Status:** Successfully deployed and tested.

### Frontend Deployment

The frontend deployment workflow was reviewed and prepared for future production deployment. The required configuration for connecting the frontend with the backend API was analyzed.

### Database

**Database:** MySQL

### Technology Stack

**Frontend:**
- HTML
- CSS
- JavaScript
- React

**Backend:**
- Node.js
- Express.js

**Database:**
- MySQL

**Deployment Platform:**
- Render

## Known Limitations

- The application is currently running on free hosting resources.
- Free hosting services may experience slower response time after inactivity.
- Additional configuration is required for complete frontend production deployment.
