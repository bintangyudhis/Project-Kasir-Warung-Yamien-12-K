

<?php $__env->startSection('title', 'Tambah Menu - MeTime'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .error-message {
      color: #d9534f; /* Warna merah untuk error */
      font-size: 0.9em;
      margin-top: 5px;
      display: block;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: #f2f2f2;
        color: #333;
    }

    .container {
        display: flex;
        height: 100vh;
    }

    .sidebar {
        width: 220px;
        background-color: #000;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
    }

    .profile {
        text-align: center;
        margin-bottom: 40px;
    }

    .avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #777;
        margin: 0 auto 10px;
    }

    .role {
        font-size: 12px;
        color: #aaa;
    }

    .name {
        font-size: 14px;
        color: #00c6ff;
    }

    .menu-nav {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        padding: 0 30px;
    }

    .menu-nav a {
        color: #ccc;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
        padding: 8px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .menu-nav a:hover,
    .menu-nav a.active {
        background-color: #ff6633;
        color: #fff;
    }

  .main-content {
    flex: 1;
    background: #fff;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    padding: 40px;
    overflow-y: auto;
  }

  .form-container {
    max-width: 600px;
    margin: 0 auto;
  }

  .form-container h2 {
    font-size: 26px;
    font-weight: 700;
    color: #222;
    margin-bottom: 25px;
  }

  .menu-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  label {
    font-weight: 600;
    color: #333;
    font-size: 14px;
  }

  input,
  textarea,
  select {
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid #ccc;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
  }

  input:focus,
  textarea:focus,
  select:focus {
    border-color: #ff6633;
    box-shadow: 0 0 5px rgba(255, 102, 51, 0.3);
  }

  .upload-box {
    border: 2px dashed #bbb;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    color: #666;
    cursor: pointer;
    transition: 0.3s;
  }

  .upload-box:hover {
    border-color: #ff6633;
    background-color: #fff4ef;
  }

  .form-actions {
    display: flex;
    gap: 15px;
    margin-top: 20px;
  }

  .btn {
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s;
    text-decoration: none;
    text-align: center;
  }

  .btn.save {
    background-color: #22c55e;
    color: white;
  }

  .btn.cancel {
    background-color: #ccc;
    color: #333;
  }

  .btn:hover {
    transform: translateY(-2px);
    opacity: 0.9;
  }

  @media (max-width: 768px) {
    .container {
      flex-direction: column;
    }

    .sidebar {
      width: 100%;
      flex-direction: row;
      justify-content: space-around;
    }

    .main-content {
      padding: 20px;
    }

    .form-container {
      width: 100%;
    }
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="form-container">
        <h2>Tambah Menu Baru</h2>

        <form class="menu-form" action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="name" placeholder="Masukkan nama menu" value="<?php echo e(old('name')); ?>" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea rows="3" name="description" placeholder="Masukkan deskripsi menu"><?php echo e(old('description')); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" placeholder="Masukkan harga" value="<?php echo e(old('price')); ?>" required>
            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" required>
              <option value="" selected disabled>Pilih kategori</option>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                      <?php echo e($category->name); ?>

                  </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stock_quantity" placeholder="Masukkan jumlah stok" required min="1">

                        <?php $__errorArgs = ['stock_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

          <div class="form-group">
            <label>Gambar Menu</label>
            <div class="upload-box" onclick="document.getElementById('photo-input').click()">
              <p>Klik untuk unggah gambar</p>
              <input type="file" name="photo" id="photo-input" style="display: none;" accept="image/*" onchange="updateFileName(this)">
            </div>
            <span id="file-name" style="font-size: 12px; color: #666; margin-top: 5px;"></span>
            <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <script>
            function updateFileName(input) {
              const fileName = input.files[0]?.name;
              const fileNameDisplay = document.getElementById('file-name');
              if (fileName) {
                fileNameDisplay.textContent = 'File dipilih: ' + fileName;
              }
            }
          </script>

          <div class="form-actions">
            <button type="submit" class="btn save">Simpan</button>
            <a href="<?php echo e(route('products.index')); ?>" class="btn cancel">Batal</a>
          </div>
        </form>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Downloads\metimev2\resources\views/products/create.blade.php ENDPATH**/ ?>