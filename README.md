# Attendance Monitoring System

An automated attendance tracking and reporting application built for educational institutions to streamline student attendance logging, generate auto-synced classroom records, and deliver data-backed insights.

---

## Project Overview

The **Attendance Monitoring System** simplifies the daily tracking of student attendance across course blocks, subject loads, and academic schedules. Built on a modern full-stack Laravel/Livewire architecture, the platform features real-time interface updates, structured database management, and Gemini AI-assisted analytical tooling to assist instructors in identifying attendance patterns and risk indicators.

---

## Authors & Credits

* **System Architecture & Backend Development:** Jay Imperial Millena
* **Frontend Design & Implementation:** Jay Imperial Millena (Powered by Livewire & Tailwind CSS)
* **AI Integration & Assistance:** Gemini AI API

---

## Tech Stack & System Requirements

### Backend & Core Framework
* **PHP:** `^8.2` or `^8.3`
* **Framework:** [Laravel 11.x](https://laravel.com/)
* **Database Engine:** MySQL `^8.0` / MariaDB `^10.4`

### Frontend & Reactive UI
* **Reactivity:** [Livewire v3](https://livewire.laravel.com/) (Auto-sync components)
* **Styling Framework:** [Tailwind CSS v3](https://tailwindcss.com/)
* **Build Tool:** Vite

### External Services
* **AI Model:** Google Gemini API (`gemini-1.5-flash` / `gemini-1.5-pro`)

---

## Key Features

* **Real-time Attendance Logging:** Livewire-powered auto-sync components for instant attendance updates without page reloads.
* **Faculty & Subject Loading:** Seamless integration with block schedules, subject codes, and room assignments.
* **Gemini AI Assistance:** Automated summaries of student attendance trends, recurring absences, and actionable risk alerts.
* **Responsive Dashboard:** Utility-first, mobile-friendly interface designed with Tailwind CSS for classroom accessibility.
* **Data Management:** Full CRUD protocols, database seeders, and migration tracking for institutional scale.

---

## Getting Started

### Prerequisites

Ensure you have the following installed locally:
- **PHP** `>= 8.2` (with `pdo_mysql`, `mbstring`, `xml`, `curl` extensions enabled)
- **Composer** `>= 2.5`
- **Node.js** `>= 18.x` & **NPM**
- **MySQL** `>= 8.0`

---

### Installation & Setup Guide

#### 1. Clone the Repository
```bash
git clone [https://github.com/jaymillena/attendance-monitoring.git](https://github.com/jaymillena/attendance-monitoring.git)
cd attendance-monitoring