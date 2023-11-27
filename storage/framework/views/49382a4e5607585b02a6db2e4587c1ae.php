<div class="card-header">
    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php echo e(!empty($_GET['id']) ? '' : 'active'); ?>" data-bs-toggle="tab" href="#documentTypes" role="tab">
                <i class="fas fa-home"></i>
                Document Types
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#institute" role="tab">
                <i class="fas fa-home"></i>
                Institute
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute-type' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#instituteType" role="tab">
                <i class="fas fa-home"></i>
                Institute Type
            </a>
        </li>

        

        
    </ul>
</div>
<?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/layouts/instituteHeader.blade.php ENDPATH**/ ?>