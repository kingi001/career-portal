# Job Application Portal

## Overview

The **Job Application Portal** is a web-based platform designed to streamline the job application process. It allows users to create profiles, add their educational background, manage personal information, and apply for job opportunities. The portal is built using **Laravel Breeze** and **Tailwind CSS** for a modern and responsive user experience.

## Features

### ✅ **User Management**

- User registration and authentication
- Profile management (Personal Information, Education, etc.)

### 🎓 **Education Section**

- Add, edit, and delete education background
- Fields: Institution, Level of Study, Field of Study, Award, Start Date, End Date
- Validation to ensure correct data input

### 📜 **Personal Information Section**

- Includes: Full Name, Email, Phone Number, Date of Birth, Gender, Marital Status, National ID, Nationality, County, Subcounty, Ethnicity
- Dropdowns for easy selection
- Eloquent relationships for location-based data

### 📑 **Job Application Management** *(Future Development)*

- Browse and apply for jobs
- View application status
- Upload resumes and cover letters

## Technology Stack

- **Backend:** Laravel 10 (Breeze Authentication)
- **Frontend:** Tailwind CSS, Alpine.js
- **Database:** MySQL
- **Version Control:** Git & GitHub
- **Deployment:** Laravel Forge / DigitalOcean (Planned)

## Installation & Setup

### 1️⃣ Clone the Repository

```sh
    git clone https://github.com/yourusername/job-application-portal.git
    cd job-application-portal
```

### 2️⃣ Install Dependencies

```sh
    composer install
    npm install
```

### 3️⃣ Setup Environment Variables

```sh
    cp .env.example .env
    php artisan key:generate
```

### 4️⃣ Configure Database

Update `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

Then run:

```sh
    php artisan migrate
```

### 5️⃣ Run the Application

```sh
    php artisan serve
```

Then open `http://127.0.0.1:8000` in your browser.

## Screenshots *(Coming Soon)*

## Future Enhancements

- Implement job application workflow
- Add an admin panel for job posting management
- Improve UI/UX with better responsiveness

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a new branch (`feature/your-feature`)
3. Commit changes and push to GitHub
4. Submit a pull request

## License

This project is licensed under the **MIT License**.

---

🚀 **Developed by Quantum Solutions** | [Your Contact Information]

