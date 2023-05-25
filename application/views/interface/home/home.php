<div class="container mx-auto mdmax:px-4">
    <?php if (!empty($produk)) {?>
        <h1 class="text-orange-400 text-xl font-semibold">Produk Kami</h1>
        <div class="grid grid-cols-4 mdmax:grid-cols-3 gap-2 gap-y-4">
            <?php foreach($produk as $data) :?>
                <a href="<?php echo base_url('belanja/detail/'.$data->id_produk)?>" class="block group">
                    <img
                        src="https://images.unsplash.com/photo-1592921870789-04563d55041c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                        alt=""
                        class="object-cover w-full rounded aspect-square h-52"
                    />

                    <div class="mt-3">
                        <h3
                            class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4 truncate"
                        >
                            <?php echo $data->nama_produk; ?>
                        </h3>

                    </div>
                    <div class="flex justify-between mt-3 text-sm">
                        <p class="mt-1 text-sm text-gray-700"><?php echo IDR($data->harga); ?>  
                            <?php if(!empty($data->stok)) { ?>
                                <span class="mdmax:w-full"> | Stock: </span>
                                <?php echo $data->stok; ?>
                            <?php } else { echo 'Stok Habis'; }?>
                        </p>
                        
                        <!-- <p class="text-gray-900">$299</p> -->
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php } else {?>
        <h1>Produk Sedang </h1>
    <?php } ?>
</div>