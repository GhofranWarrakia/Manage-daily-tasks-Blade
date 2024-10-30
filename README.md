# Daily Task Management System

This project allows users to add, edit, and delete daily tasks, with the added feature of sending daily email reminders for pending tasks.

## Requirements

- **PHP** (version 7.4 or higher)
- **Laravel** (version 8 or higher)
- **Web Server** (such as Apache or Nginx)
- **Database** (such as MySQL or SQLite)
- **Email Configuration** (for sending notifications)

## Setup

1. **Clone the Project**:
 
   git clone https://github.com/username/repository.git
   cd repository


2. **Install Dependencies**:
 
   composer install
 

3. **Environment Setup**:
   - Copy the example environment file:
  
     cp .env.example .env
   
   - Update the database and email configuration settings in the `.env` file.

4. **Generate Application Key**:

   php artisan key:generate


5. **Run Migrations**:

   php artisan migrate


## Configuring the Cron Job for Daily Email Reminders

This project uses a Cron Job to send a daily email notification to each user with their pending tasks.

1. **Setting up the Command**:
   - Laravel's Artisan command is scheduled to run daily using a system Cron Job.
   - On Linux, open your Cron settings:
    
     crontab -e
   
   - Add the following line to schedule the task to run daily at midnight:

     * 0 * * * /usr/bin/php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
  

2. **Testing the Cron Job**:
   - You can test the command manually using:

     php artisan schedule:run


## Displaying the User Interface with Blade

The user interface is built with Blade and allows users to view the task list, add new tasks, edit, and delete tasks.

### Steps

1. **Start the Server**:
   - Run the following command to start the Laravel development server:
  
     php artisan serve

   - Open a web browser and navigate to `http://127.0.0.1:8000` to view the user interface.

2. **User Interface**:
   - **Home Page**: Displays a list of daily tasks.
   - **Add New Task**: Button to add a new task.
   - **Edit Tasks**: To update an existing task's details.
   - **Delete Tasks**: To delete a specific task.

## Notes

- Ensure your email settings are properly configured in the `.env` file to enable notifications.
- To customize the UI or colors, edit the Blade files in the `resources/views` folder.



### License

© 2024 All rights reserved.

This project is licensed under the FOCAL X.


### References
Laravel Documentation
