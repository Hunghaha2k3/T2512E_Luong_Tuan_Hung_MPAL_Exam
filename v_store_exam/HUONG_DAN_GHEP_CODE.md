# Huong dan lam bai PHPL Set02 (Laravel)

Du an da tao san: `v_store_exam`

## 1) Chay du an
1. Mo terminal tai thu muc `v_store_exam`.
2. Tao database:
   - Mo MySQL va chay file `setup/create_database.sql`.
3. Kiem tra `.env` da co:
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3306`
   - `DB_DATABASE=v_store`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=`
4. Chay migrate:
   - `php artisan migrate:fresh`
5. Chay web:
   - `php artisan serve`
6. Mo trinh duyet: `http://127.0.0.1:8000`

## 2) Ghep noi tung cau theo de

### Cau 1.1 - Migration tao bang
- File: `database/migrations/2026_05_28_115530_create_item_sales_table.php`
- Da tao bang `item_sale` voi cac cot:
  - `id`
  - `item_code`
  - `item_name`
  - `quantity`
  - `expried_date`
  - `note`

### Cau 1.2 - Validate
- File: `app/Http/Controllers/ItemSaleController.php`
- Validate trong `store()` va `update()`:
  - `item_code`: required, khong ky tu dac biet
  - `item_name`: required, khong ky tu dac biet

### Cau 1.3 - Add New
- Route: `item-sale.create`, `item-sale.store`
- Files:
  - `routes/web.php`
  - `resources/views/item_sale/create.blade.php`
  - `app/Http/Controllers/ItemSaleController.php` (`create`, `store`)

### Cau 1.4 - Hien thi danh sach
- Route: `item-sale.index`
- Files:
  - `resources/views/item_sale/index.blade.php`
  - `app/Http/Controllers/ItemSaleController.php` (`index`)

### Cau 1.5 - Edit
- Route: `item-sale.edit`, `item-sale.update`
- Files:
  - `resources/views/item_sale/edit.blade.php`
  - `app/Http/Controllers/ItemSaleController.php` (`edit`, `update`)

## 3) Danh sach file can thuoc
- `app/Models/ItemSale.php`
- `app/Http/Controllers/ItemSaleController.php`
- `database/migrations/2026_05_28_115530_create_item_sales_table.php`
- `resources/views/item_sale/layout.blade.php`
- `resources/views/item_sale/index.blade.php`
- `resources/views/item_sale/create.blade.php`
- `resources/views/item_sale/edit.blade.php`
- `routes/web.php`
- `setup/create_database.sql`

## 4) Luu y de tranh mat diem
- De dung ten cot `expried_date` (de goc dang viet nhu vay).
- Neu MySQL khong chay, migration se bao loi ket noi cong 3306.
- Neu can UI dep hon (diem bonus), ban co the them icon, spacing va mau nen trong `layout.blade.php`.
