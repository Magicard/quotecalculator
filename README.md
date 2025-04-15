# Quote Calculator – Pricing Module

The goal is to calculate delivery costs based on:
- The total distance (multiple drop-offs supported)
- A customizable cost-per-mile
- An optional charge for a second delivery person

---

## Features

- Accepts 1–5 delivery drop-offs
- Dynamic cost-per-mile support
- Optional second-person flat fee (configurable)
- Clean, testable service structure
- JSON API endpoint for integration
- Pest-powered test suite (unit & feature tests)
- GitHub Actions CI with automatic test runs

---

## Why I Structured It This Way

- **Services**: The core logic lives in a `QuoteCalculatorService`, which is decoupled from the controller. This makes it easy to test and extend with future logic or pricing strategies.
- **Form Requests**: Input validation is handled via a custom request class (`CalculateQuoteRequest`), keeping the controller clean.
- **Consistency**: All responses follow a consistent quote schema, so other calculators (e.g., international or express delivery) can plug into the same structure.
- **Tests**: Written with Pest to ensure correctness and confidence in future changes.
- **CI**: GitHub Actions ensures tests pass before any code is merged.

---

## What i'd add/change with more time 

- **Money Handling**: Introduce laravel-money for precise currency formatting and arithmetic, avoiding floating point errors and improving consistency.
- **Quote Model + Resource Controller**: Replace the current data array with an Eloquent Quote model. This would allow quotes to be stored in a database, making them versionable, reusable, and easier to expand.
- **Quote Resource**: With a model in place, the model resource can adapt depending on what type of quote it would be.
- **Authentication & Persistence**: Add user authentication and link quotes to specific users or roles, enabling saved quotes, quote history, and permissions.

---

## 🛠️ Setup Instructions

### 1. Clone the repo

```bash
git clone https://github.com/Magicard/quotecalculator.git
cd quotecalculator
```
### 2. Install the dependencies 

```bash
composer install
```

### 3. Set up enviroment
```bash
cp .env.example .env
php artisan key:generate
```
### 4. Run the server
```bash
php artisan serve
```
API will be available at:
http://localhost:8000/api/quote

### 5. Run the tests
```bash
vendor/bin/pest
```
