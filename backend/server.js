const express = require("express");
const cors = require("cors");
require("dotenv").config();

const app = express();

app.use(cors());
app.use(express.json());

/* -------------------- Sample Data -------------------- */

let homestays = [
    {
        id: 1,
        name: "Mountain View Cottage",
        location: "Mussoorie",
        price: 2500
    },
    {
        id: 2,
        name: "River Side Homestay",
        location: "Rishikesh",
        price: 1800
    },
    {
        id: 3,
        name: "Forest Eco Stay",
        location: "Nainital",
        price: 2200
    }
];

let users = [];

let bookings = [];

/* -------------------- Home -------------------- */

app.get("/", (req, res) => {
    res.status(200).json({
        message: "EcoStay AI Backend Running Successfully"
    });
});

/* =========================================================
   API 1 : GET ALL HOMESTAYS
========================================================= */

app.get("/api/homestays", (req, res) => {
    res.status(200).json(homestays);
});

/* =========================================================
   API 2 : GET SINGLE HOMESTAY
========================================================= */

app.get("/api/homestays/:id", (req, res) => {

    const id = parseInt(req.params.id);

    const homestay = homestays.find(h => h.id === id);

    if (!homestay) {
        return res.status(404).json({
            message: "Homestay Not Found"
        });
    }

    res.status(200).json(homestay);

});

/* =========================================================
   API 3 : REGISTER
========================================================= */

app.post("/api/register", (req, res) => {

    const { name, email, password } = req.body;

    if (!name || !email || !password) {
        return res.status(400).json({
            message: "All Fields Are Required"
        });
    }

    const existing = users.find(u => u.email === email);

    if (existing) {
        return res.status(400).json({
            message: "Email Already Exists"
        });
    }

    const user = {
        id: users.length + 1,
        name,
        email,
        password
    };

    users.push(user);

    res.status(201).json({
        message: "Registration Successful",
        user
    });

});

/* =========================================================
   API 4 : LOGIN
========================================================= */

// API 4 - Login User
app.post("/api/login", (req, res) => {

    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).json({
            message: "Email and Password are required"
        });
    }

    const user = users.find(
        u => u.email === email && u.password === password
    );

    if (!user) {
        return res.status(404).json({
            message: "Invalid Email or Password"
        });
    }

    res.status(200).json({
        message: "Login Successful",
        user
    });

});

/* =========================================================
   API 5 : CREATE BOOKING
========================================================= */

app.post("/api/bookings", (req, res) => {

    const { userName, homestayName, checkIn, checkOut } = req.body;

    if (!userName || !homestayName || !checkIn || !checkOut) {
        return res.status(400).json({
            message: "All Booking Fields Are Required"
        });
    }

    const booking = {
        id: bookings.length + 1,
        userName,
        homestayName,
        checkIn,
        checkOut
    };

    bookings.push(booking);

    res.status(201).json({
        message: "Booking Successful",
        booking
    });

});

/* =========================================================
   API 6 : GET BOOKINGS
========================================================= */

app.get("/api/bookings", (req, res) => {

    res.status(200).json(bookings);

});

/* =========================================================
   API 7 : DELETE BOOKING
========================================================= */

app.delete("/api/bookings/:id", (req, res) => {

    const id = parseInt(req.params.id);

    const booking = bookings.find(b => b.id === id);

    if (!booking) {

        return res.status(404).json({
            message: "Booking Not Found"
        });

    }

    bookings = bookings.filter(b => b.id !== id);

    res.status(200).json({
        message: "Booking Deleted Successfully"
    });

});

/* =========================================================
   API 8 : SEARCH HOMESTAYS
========================================================= */

app.get("/api/search", (req, res) => {

    const location = req.query.location;

    if (!location) {

        return res.status(400).json({
            message: "Location Required"
        });

    }

    const result = homestays.filter(h =>
        h.location.toLowerCase().includes(location.toLowerCase())
    );

    res.status(200).json(result);

});

/* =========================================================
   ERROR HANDLER
========================================================= */

app.use((req, res) => {

    res.status(404).json({
        message: "Route Not Found"
    });

});

/* =========================================================
   SERVER
========================================================= */

const PORT = process.env.PORT || 5000;

app.listen(PORT, () => {

    console.log(`Server Running On Port ${PORT}`);

});