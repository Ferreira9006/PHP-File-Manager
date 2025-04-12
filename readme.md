# PHP File Manager

A lightweight and secure web-based file manager built with PHP. Includes user authentication and database integration for enhanced control and protection.

## 📁 Features

- ✅ User login system (MySQL-based authentication)
- 🗂️ File and folder browsing
- 📄 File viewing and editing (soon)
- ⬆️ File upload and ⬇️ download (soon)
- 📁 Folder creation (soon)
- ✏️ Rename, move, and delete files/folders (soon)
- 🔐 Session handling and access control
- 💡 Responsive and intuitive user interface
- 📥 Email Notifications (soon)

## ⚙️ Requirements

- PHP 8.0 or higher  
- MySQL database  
- Composer

## 🚀 Installation


1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/project-name.git
   ```

2. **Navigate to the project directory:**
   ```bash
   cd project-name
   ```

3. **Install dependencies via Composer:**
   ```bash
   composer install
   ```

3. **Create the database**

Import the `database.sql` file into your MySQL server to create the required tables and sample user.

4. **Configure the database connection**

Edit the file `.env` and set your MySQL credentials:


### 🚀 Launch using PHP Built-in Server (Recommended)

1. From the project root, run:
   ```bash
   php -S localhost:8000 -t public
   ```

2. Open your browser and visit: [http://localhost:8000](http://localhost:8000)

3. Default credentials are currently being used:
  ```
    email: admin@admin.com
    password: 1234
  ```


## 🔐 Security

- Only authenticated users can access the file manager.
- Sessions are used to maintain login state.
- All user input is sanitized to prevent SQL injection and XSS attacks.
- Still, **always restrict access to trusted users** if hosting publicly.

## 🛠️ Customization

- Update UI styles via `assets/`
- Adjust allowed file types or actions in `includes/functions.php`
- Extend the login system or roles if needed


## 👨‍💻 Author

Developed by [Ferreira9006](https://github.com/Ferreira9006)

---

*Built for simplicity, extended for security.*