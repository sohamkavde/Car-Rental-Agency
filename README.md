#Registration Form :
    Creating Two different Table for admin(Car rental service) and customer to distincly identify
    For Admin 
        Two fields :UserName, Email id  and Password 
    For Client(User)
        Two fields :UserName, Email id  and Password 

    UI : Page is divided in two half verically , First half will be "Image of car" and second half will be form 
Login Form : 
    using above code of Registration I created login form UI

Admin Panel :
    DashBoard.php: Admin can add Cars and details 
    view.php : Admin can view, update and delete all car details (To show cars to customer I am going to use this view UI Component)


Day 2 :
Registration Form : 
    For Admin : 
        DB Fields: id,UserName,Email id, Password,Status(Active/Deactive),date and time (Asia/Kolkata time zone)
        Insertion Done with 
        check points:
        1 Email exist or not
        2 Data inserted successfully or not 
            : On successfully insertion : redirected to respected login page
    For customer:
        Same as Admin with minor changes like changed table name , redirection
    
Login Page :
    For Admin:
        check points:
        1 Email exist or not
        2 Password verification
            : On successfully verification : redirected to ../admin/admin-dashboard page
        3 Session variable is added as key of admin

    For Admin:
        check points:
        1 Email exist or not
        2 Password verification
            : On successfully verification : redirected to ../customer/customer-dashboard page
        3 Session variable is added as key of customer
        4 change Session name from userName to userName1 to distincly identify between user and client 
    
Admin-dashboard Page:
    1 performing insert opertion:
    2 table : vehicledetailsdb with fields Vehicle model, Vehicle number, seating capacity, rent per day,date,time,status,userid   
    3 update operation perform 
View Page (For admin):
    1 show All details related to inserted car cars
    2 Delete operation perform 
index page:
    showing details according to pdf
    1 Only customer can see extra information like rent per day,start day 
    2 Only customer can book car 
    3 if car rental service owner try to book a car : alert message will show
    4 if user is logged out and try to book a car : alert message will show

Day 3: 
‘View booked cars’ page:
    1 creating booking button on view.php page on each listed car : that will redirected admin(car rental service) to viewBookedCars page
    2 showing list of user(customer) in table who booked respected car. (we can do it by adding filter as well)
        
Deploy:000webhost



