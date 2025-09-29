# Routes Documentation

## Pathshala EIMS - Route Structure

This document outlines the route structure for the Pathshala Educational Institution Management System.

### Route Organization

The routes are organized into logical groups:

#### 1. Public Routes (No Authentication Required)
- **Home**: `/` - Landing page with features and news
- **About**: `/about` - About page
- **Contact**: `/contact` - Contact information
- **Features**: `/features` - System features listing
- **News**: `/news` - News index and individual articles
- **Events**: `/gallery` - Event gallery
- **Customers**: `/customers`, - Customer showcase

#### 2. Authentication Routes
- **Login**: `/login`, `/admin/login` - Admin login
- **Logout**: `/admin/logout` - Admin logout

#### 3. Admin Routes (Authentication Required)
All admin routes are prefixed with `/admin` and require authentication:

##### Dashboard
- `GET /admin` - Admin dashboard

##### Gallery Management
- `GET /admin/galleries` - Gallery index
- `POST /admin/galleries` - Store new gallery item
- `DELETE /admin/galleries/{id}` - Delete gallery item

##### Customer Management
- `GET /admin/customers` - Customer index
- `POST /admin/customers` - Store new customer
- `PUT /admin/customers/{id}` - Update customer
- `DELETE /admin/customers/{id}` - Delete customer

##### News Management
- `GET /admin/news` - News management index
- `POST /admin/news` - Store new news article
- `PUT /admin/news/{id}` - Update news article
- `DELETE /admin/news/{id}` - Delete news article

##### Utilities
- `GET /admin/search` - Search functionality
- `POST /admin/upload` - Legacy upload endpoint

### Controllers

#### HomeController
Handles the main landing page with features and news.

#### PublicPageController
Manages all public-facing pages including about, contact, features, news, gallery, and customers.

#### AuthController
Handles authentication logic for admin login/logout.

#### AdminController
Manages all administrative functionality including galleries, customers, news, and search.

### Middleware

- **auth**: Applied to all admin routes to ensure only authenticated users can access them
- **web**: Default middleware group for web routes (sessions, CSRF protection, etc.)

### Route Naming Convention

Routes follow Laravel's standard naming convention:
- Public routes: `routename` (e.g., `home`, `about`)
- Admin routes: `admin.resource.action` (e.g., `admin.galleries.store`)
- Authentication: `admin.login`, `admin.logout`

### Route Groups

Routes are organized using Laravel's route groups for:
- **Prefix**: Admin routes use `/admin` prefix
- **Middleware**: Authentication middleware for protected routes
- **Controller**: Grouping routes by controller
- **Namespace**: Proper controller namespacing

This structure provides:
- ✅ Clear separation of concerns
- ✅ Consistent naming conventions
- ✅ Proper middleware application
- ✅ Easy maintenance and scalability
- ✅ RESTful resource routing