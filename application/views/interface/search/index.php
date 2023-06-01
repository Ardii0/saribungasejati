<div class="container mx-auto mdmax:px-4">
    <h1><span class="text-orange-400 text-xl font-semibold">Hasil Pencarian:</span><span class="pl-1"><?php echo $hasil; ?></span></h1>
    <?php if(empty($search)) { ?>
        <p class="text-center text-lg">
            Tidak dapat menemukan hasil yang dicari..
        </p>
    <?php } else { ?>
        <div class="grid grid-cols-4 mdmax:grid-cols-3 gap-2 gap-y-4">
            <?php foreach($search as $search) :?>
                <a href="<?php echo base_url('belanja/detail/'.$search->id_produk)?>" class="block group">
                    <?php if(!empty($search->foto)) { ?>
                        <img
                            src="<?php echo base_url('uploads/foto-produk/'.$search->foto)?>"
                            alt=""
                            class="object-cover w-full rounded aspect-square h-52"
                        />
                    <?php } else { ?>
                        <img
                            src="<?php echo base_url('assets/no_image.png')?>"
                            alt=""
                            class="object-cover w-full rounded aspect-square h-52"
                        />
                    <?php } ?>
    
                    <div class="mt-3">
                        <h3
                            class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4 truncate"
                        >
                            <?php echo $search->nama_produk; ?>
                        </h3>
    
                    </div>
                    <div class="flex justify-between mt-3 text-sm">
                        <p class="mt-1 text-sm text-gray-700"><?php echo IDR($search->harga); ?>  
                            <?php if(!empty($search->stok)) { ?>
                                <span class="mdmax:w-full"> | Stock: </span>
                                <?php echo $search->stok; ?>
                            <?php } else { echo '| Stok Habis'; }?>
                        </p>
                        
                        <!-- <p class="text-gray-900">$299</p> -->
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php } ?>
</div>