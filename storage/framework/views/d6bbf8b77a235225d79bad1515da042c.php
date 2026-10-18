<?php $__env->startSection('title','Form Berita'); ?>
<?php $__env->startSection('content'); ?>
<?php $isEdit = $post->exists; ?>
<h1 class="text-2xl mb-6"><?php echo e($isEdit ? 'Edit' : 'Tambah'); ?> Berita</h1>
<form action="<?php echo e($isEdit ? route('admin.posts.update',$post) : route('admin.posts.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4"><?php echo csrf_field(); ?>
  <?php if($isEdit): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
  <div><label class="font-semibold">Judul</label><input type="text" name="title" value="<?php echo e(old('title',$post->title)); ?>" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Kategori</label><select name="category_id" class="w-full border rounded-lg px-3 py-2 mt-1"><option value="">-</option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c->id); ?>" <?php echo e($post->category_id==$c->id?'selected':''); ?>><?php echo e($c->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
    <div><label class="font-semibold">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1"><?php $__currentLoopData = ['draft','published','archived']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php echo e(($post->status ?? 'draft')==$s?'selected':''); ?>><?php echo e(ucfirst($s)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
  </div>
  <div><label class="font-semibold">Thumbnail</label><input type="file" name="thumbnail" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white"><?php if($post->thumbnail): ?><div class="mt-2 text-xs text-slate-500">File saat ini: <?php echo e($post->thumbnail); ?></div><?php endif; ?></div>
  <div><label class="font-semibold">Ringkasan</label><textarea name="excerpt" rows="2" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e(old('excerpt',$post->excerpt)); ?></textarea></div>
  <div><label class="font-semibold">Isi Berita</label><textarea name="body" id="editor-body" rows="14" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e(old('body',$post->body)); ?></textarea></div>
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Tags</label><input type="text" name="tags" value="<?php echo e(old('tags',$post->tags)); ?>" class="w-full border rounded-lg px-3 py-2 mt-1" placeholder="ciwiru, desa, pertanian"></div>
    <div><label class="font-semibold">Tanggal Publish</label><input type="datetime-local" name="published_at" value="<?php echo e($post->published_at?->format('Y-m-d\TH:i')); ?>" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div class="flex gap-2"><button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan</button><a href="<?php echo e(route('admin.posts.index')); ?>" class="bg-slate-200 hover:bg-slate-300 px-6 py-2 rounded-lg transition">Batal</a></div>
</form>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor-body'), {
    toolbar: ['heading','|','bold','italic','link','bulletedList','numberedList','|','outdent','indent','|','blockQuote','insertTable','undo','redo']
  }).catch(console.error);
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/posts/form.blade.php ENDPATH**/ ?>