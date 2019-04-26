<template>
  <div>
    <div class="btn-group">
      <button type="button" class="btn btn-flat" data-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div
        class="dropdown-menu"
        x-placement="bottom-start"
        style="position: absolute; transform: translate3d(57px, 29px, 0px); top: 0px; left: 0px; will-change: transform;"
      >
        <a class="dropdown-item" :href="'/admin/class/'">
          <i class="far fa-eye"></i> View
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-trash-alt"></i> Remove
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>