
# Service Booking Platform Backend

A simple service booking platform backend built using Laravel.

## Table of Contents
- [Setup & Run Instructions](#setup--run-instructions)
- [API Documentation](#api-documentation)
- [How to Run Tests](#how-to-run-tests)
- [Assumptions](#assumptions)

---

## Setup & Run Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/zahidhasan566/service-booking.git
   cd service-booking
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Create a `.env` file and configure your database settings:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Seed the database (optional for sample data):**
   ```bash
   php artisan db:seed
   ```

6. **Serve the application:**
   ```bash
   php artisan serve
   ```

   The API will be available at `http://127.0.0.1:8000`.

---

## API Documentation

### 1. View Available Services

**GET** `/api/services`  
Returns a paginated list of available services.

#### Example Request:
```bash
GET /api/services
```

#### Example Response:
```json
[
  {
    "id": 1,
    "name": "House Cleaning",
    "category": "Home Service",
    "price": 50.00,
    "description": "Deep cleaning of the entire house"
  }
]
```

---

### 2. Book a Service

**POST** `/api/bookings`  
Allows customers to book a service.

#### Request Body:
```json
{
  "name": "Kaifa",
  "phone": "01974601166",
  "service_id": 1,
  "schedule_time": "2025-05-10 10:00:00"
}
```

#### Example Response:
```json
{
  "id": 1,
  "name": "Kaifa",
  "phone": "01774601166",
  "service_id": 1,
  "status": "pending",
  "schedule_time": "2025-05-10 10:00:00"
}
```

---

### 3. Track Booking Status

**GET** `/api/bookings/{id}`  
Returns the booking details and status.

#### Example Request:
```bash
GET /api/bookings/1
```

#### Example Response:
```json
{
  "id": 1,
  "name": "Kaifa",
  "phone": "01974601166",
  "service_id": 1,
  "status": "pending",
  "schedule_time": "2025-05-10 10:00:00"
}
```

---

## How to Run Tests

1. **Run Unit Tests:**
   ```bash
   php artisan test
   ```


### 📁 Folder Structure

```
service-booking/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── ServiceController.php
│   │   │   │   └── BookingController.php
│   │   │   ├── Api/
│   │   │   │   ├── ServiceController.php
│   │   │   │   └── BookingController.php
│   │   │   ├── AuthController.php
│   │   │   └── ServiceController.php
│   ├── Mail/
│   │   └── BookingConfirmed.php
│   │   └── Middleware/
│   │   │   ├── IsAdmin.php
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── docker/
│   └── nginx/
│       └── conf.d/
│           └── default.conf
├── public/
├── resources/
│   ├── js/
│   └── views/
│       └── emails/
│           └── booking/
│           	└── confirmed.blade.php
├── routes/
│   └── api.php
├── storage/
├── tests/
│   ├── Feature/
│           └── BookingTest.php
│           └── ExampleTest.php
│           └── ServiceTest.php
│   └── Unit/
│         └── ExampleTest.php
├── .env.example
├── Dockerfile
├── docker-compose.yml
├── composer.json
└── README.md
```

---

## Assumptions

- The application uses a **MySQL** database.
- The API is **stateless**.and JWT authentication is required for admin operations
- Mail Notifications has been implemented. 
- The **services** are already available in the system and are being listed via the `/api/services` endpoint.
- Project has been Dockerized.

---
