//  For new project instsll
composer global require laravel/installer
laravel new HMS-SHAAN-02 {it will install breeze al all things}

➜ cd HMS-SHAAN-02
➜ npm install && npm run build
➜ composer run dev

basic:
php artisan make:model Appointment -m
php artisan make:controller AppointmentController --resource

Advanced:
php artisan make:model Appointment -mrc
php artisan make:model Appointment -mcrfs // advanced


//Cache clear: Clear Cached Routes
php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan view:clear

If the issue persists, recompile the route cache:
php artisan route:cache


middleware:
php artisan make:middleware MiddlewareName

auth class facades:
C:\xampp\htdocs\LARAVEL_BEGINING\PROJECT-HMS-SHAAN\vendor\laravel\framework\src\Illuminate\Support\Facades\Auth.php




{{-- php artisan make:controller Api/UserController  -r
php artisan make:controller Api/PatientController  -r
php artisan make:controller Api/DoctorController  -r
php artisan make:controller Api/BedController  -r
php artisan make:controller Api/BedAssignmentController  -r
php artisan make:controller Api/AppointmentController  -r
php artisan make:controller Api/ConsultationController  -r
php artisan make:controller Api/ConsultationLabTestController  -r
php artisan make:controller Api/DoctorAppointmentController  -r
php artisan make:controller Api/PaymentDetailController  -r
php artisan make:controller Api/BillingController  -r
php artisan make:controller Api/BillingBedController  -r
php artisan make:controller Api/BillingConsultationController  -r
php artisan make:controller Api/BillingLabTestController  -r
php artisan make:controller Api/BillingMedicineController  -r
php artisan make:controller Api/BillingServiceController  -r --}}