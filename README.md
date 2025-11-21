# AI Bill Scanner – README

An AI-powered bill/receipt scanning tool built with **PHP**, **Veryfi OCR API**, and a clean, responsive **Tailwind CSS** interface. This application allows users to upload a bill image and instantly view extracted details such as vendor name, bill date, line items, subtotal, tax, and total amount.

> **Note:** This README covers OCR + UI only. Payment integration is intentionally excluded as requested.

---

## 🚀 Features

* Upload any bill image (JPG/PNG/WEBP/PDF)
* Extract bill/receipt details using **Veryfi OCR**:

  * Vendor / Store Name
  * Bill To (Customer)
  * Date of Purchase
  * Invoice Number
  * Line Items (Description, Qty, Price, Total)
  * Subtotal, Tax, Total Amount
  * Currency Code
* Clean, modern, responsive UI built with Tailwind CSS
* Includes a preview panel with fully formatted bill details

---

## 🛠️ Technologies Used

| Component | Technology                     |
| --------- | ------------------------------ |
| Backend   | PHP (XAMPP)                    |
| OCR API   | Veryfi API                     |
| Frontend  | HTML, Tailwind CSS, JavaScript |
| Server    | Apache (XAMPP)                 |

---

## 📂 Folder Structure

```
bill-scan/
│── index.html               # Main UI
│── process_receipt.php      # OCR backend handler
│── README.md                # Project documentation
```

---

## 📦 Installation

### Prerequisites

* Windows + XAMPP installed
* Apache & PHP enabled
* Internet connection for API calls

### Steps

1. Create project folder:

   ```
   C:\xampp\htdocs\bill-scan
   ```

2. Place the following files into the folder:

   * `index.html`
   * `process_receipt.php`
   * `README.md`

3. Start **Apache** from XAMPP Control Panel.

4. Open the app in your browser:

   ```
   http://localhost/bill-scan/index.html
   ```

---

## 🔑 Setting Up Veryfi OCR

1. Create an account at: [https://hub.veryfi.com/signup/](https://hub.veryfi.com/signup/)

2. Go to the API Keys page:

   ```
   https://app.veryfi.com/api/settings/keys/
   ```

3. Copy:

   * CLIENT_ID
   * USERNAME
   * API_KEY

4. In `process_receipt.php`, update:

   ```php
  $clientId = "YOUR_CLIENT_ID";
  $username = "YOUR_USERNAME";
  $apiKey   = "YOUR_API_KEY";
   ```

---

## 📄 Backend Code Summary (`process_receipt.php`)

* Accepts uploaded bill file
* Sends it to Veryfi via cURL
* Receives JSON with:

  * vendor
  * date
  * subtotal
  * tax
  * total
  * line_items[]
* Returns data to the frontend

---

## 🎨 Frontend Code Summary (`index.html`)

* Clean Tailwind UI
* File upload panel
* Automatically displays bill data returned from API
* Renders items in a responsive table
* Shows invoice summary and metadata

---

## 🧪 Testing

Upload sample bills such as:

* Supermarket bills
* Store receipts
* Electronics invoices
* Restaurant bills

The OCR works best with clear images.

---

## 📝 Notes

* Payment functionality intentionally **not included**.
* Veryfi charges for high-volume usage—use free tier responsibly.
* For offline OCR, a local ML model can be integrated in future versions.

---

## 📧 Support

If you'd like enhancements such as:

* Real payment integration
* Database support
* Login & dashboard
* PDF export

Feel free to ask!

---

**Built for fast, accurate, and clean bill scanning using AI.**
