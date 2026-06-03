# Warganet Management System

## 1. Project Overview
**Warganet** is a streamlined administrative web application designed to manage internet subscriptions, customer billing, and daily financial operations (expenses, withdrawals, and side incomes). The application is primarily accessed via a mobile device through a Progressive Web App (PWA) wrapper built in Android Studio, demanding a highly responsive and mobile-optimized user experience.

## 2. Technology Stack
- **Backend Framework**: Laravel (PHP)
- **Admin Panel & UI Framework**: MoonShine v3
- **Frontend Technologies**: Tailwind CSS, Alpine.js, Blade Templates
- **Database**: MySQL / MariaDB (managed via Laravel Eloquent ORM)
- **Mobile Integration**: PWA wrapped via Android Studio (WebView/TWA)

## 3. High-Level Architecture
The system follows a standard **MVC (Model-View-Controller)** pattern powered by Laravel, heavily leveraging **MoonShine v3** as the primary administrative engine. 
- **Resources**: Core entities are mapped directly to MoonShine Resources (e.g., `CustomerResource`, `BillResource`, `PaymentResource`).
- **Pages**: UI rendering is handled through MoonShine's Page architecture (`IndexPage`, `FormPage`, `DetailPage`), ensuring separation of concerns between listing, creating, and viewing data.
- **Components & Metrics**: Data visualization on the Dashboard and Index pages uses MoonShine's built-in Metric components (e.g., `ValueMetric`).

## 4. UI/UX & Design Guidelines
Since the application is heavily utilized on mobile devices (Android PWA), the UI/UX prioritizes a **Mobile-First** and **Touch-Friendly** design philosophy:

*   **Responsive Layouts**:
    *   **Dashboard Metrics**: Dashboard metric cards are specifically scaled and configured to display 2 columns per row (50% width) on mobile screens to prevent oversized, vertical-heavy layouts.
    *   **Sidebar & Menus**: Navigation links feature increased padding and font sizes (`1.1rem`) to provide comfortable, accurate touch targets for fingers.
*   **Data Table Optimization**:
    *   To prevent excessive horizontal scrolling on small screens, table cell padding is reduced.
    *   Secondary information (e.g., *IP Router*, *Admin name*, *Time* in timestamps) is intentionally hidden (`hideOnIndex`) from the main table views and reserved only for detailed viewing.
*   **Input & Forms**:
    *   Numeric fields (like amounts and fees) trigger numeric keyboards automatically on mobile devices and strip non-numeric characters on the fly, auto-formatting with thousands separators.
*   **Theming**: Clean, high-contrast UI provided by MoonShine with a custom application logo integrated into both the sidebar header and the user profile dropdown.

## 5. Core Modules
1.  **Customers**: Tracking subscriber details, Wi-Fi credentials (SSID/Password), IP router allocations, and active/inactive status.
2.  **Bills (Tagihan)**: Monthly subscription fee generation and tracking of unpaid balances.
3.  **Payments (Pembayaran)**: Recording customer payments against their bills, including discount support and admin verification.
4.  **Expenses (Pengeluaran)**: Logging operational expenses.
5.  **Side Incomes (Pendapatan Sampingan)**: Recording additional revenue streams outside of standard customer bills.
6.  **Withdrawals (Penarikan / Drawer)**: Tracking dividend or profit withdrawals by stakeholders/owners based on net system balances.

## 6. Deployment Workflow
- **Version Control**: GitHub (`main` branch).
- **CI/CD**: The production hosting environment is configured with auto-deploy webhooks. Pushing code to the `main` branch on GitHub automatically triggers a pull and sync on the live server, ensuring rapid delivery of updates.
