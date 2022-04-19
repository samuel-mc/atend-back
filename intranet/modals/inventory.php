<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<!-- languages (Basic Language: English/en) -->
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>

<style type="text/css">
    .modal-lg {
        max-width: 90% !important;
    }
</style>


<div class="modal fade fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Producto del inventario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body row" style="max-height: 85vh;">
                <input type=hidden id="product_edit_product_id" value="0">
                <div class="col-8">
                    <h5>Información del producto:</h5>
                    <div class="row" style="overflow-y: scroll;max-height: 75vh;padding-bottom: 40px;" id="product_content">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control form-control-user" id="add_product_name" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-3 pt-2">
                            <h5>SEO:</h5>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="add_product_seo_name" placeholder="nombre para el posicionamiento">
                            </div>
                        </div>
                        <div class="col-6">
                            Categorías:
                        </div>
                        <div class="col-6">
                            <select class="form-control" onchange="selectCategory()" id="category_select"></select>
                        </div>
                        <div class="col-12">
                            <div id="categories_selected" class="py-3 row"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea id="add_product_description" placeholder="Descripción larga del producto"></textarea>
                                <!--<textarea rows="4" class="form-control" id="add_product_description" placeholder="Descripción larga del producto"></textarea>-->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Descripción corta</label>
                                <textarea rows="3" class="form-control" id="add_product_short_description" placeholder="Descripción corta del producto"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Ventajas</label>
                                <textarea rows="3" class="form-control" id="add_product_advantages" placeholder="Ventajas que ofrece el producto"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Especificaciones técnicas</label>
                                <textarea rows="3" class="form-control" id="add_product_specifications" placeholder="Especificaciones técnicas del producto"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tags</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="add_product_tags" placeholder="Tags separados por #">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control form-control-user" id="add_product_code" placeholder="XXXXXXXX">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Marca</label>
                                <select  class="form-control form-control-user" id="add_product_brand">
                                    <option value="-1">Agrega una nueva...</option>
                                    <option value="0">Desconocida</option>
                                    <?php foreach ($brands as $br) { ?>
                                        <option value="<?php echo $br['id']; ?>"><?php echo $br['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Cantidad en inventario</label>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="add_product_quantity" placeholder="0">
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="col-4">
                    <h5>Imágenes:</h5>
                    <div class="row" style="overflow-y: scroll;height: 60vh;padding-bottom: 40px;">
                        <div class="col-12">
                            <div class="row">
                                <input type="file" id="product_images_file" value="Subir imagen" />
                                <input type="text" id="product_images_name" class="form-control mt-2" placeholder="Nombre de la imagen">
                                <input type="text" id="product_images_alt" class="form-control mt-2" placeholder="ALT de la imagen">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary btn-sm mt-2" onclick="uploadImage()">Subir</button>
                                </div>
                            </div>
                            <div class="row pt-4" id="product_images_container" style="border:solid gray 1px;border-radius: 10px;margin-top: 20px;"></div>
                        </div>
                    </div>
                    <h5>Precio:</h5>
                    <div class="row" style="max-height: 30vh;padding-bottom: 40px;">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Precio normal</label>
                                <input type="number" class="form-control form-control-user" id="product_price_price" placeholder="00.00">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Descuento (%)</label>
                                <input onClick="this.select();" type="number" class="form-control form-control-user price-control" id="product_price_percentage" placeholder="00.00%">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>($)</label>
                                <input onClick="this.select();" type="number" class="form-control form-control-user price-control" id="product_price_offer" placeholder="00.00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="resetAddProduct();">Cancelar</button>
                <a class="btn btn-primary" onclick="saveProduct();">Registrar</a>
            </div>
        </div>
    </div>
</div>


<!--<div class="modal fade" id="prodcutPriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Precio del producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="product_price_product_id" value="0">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Precio normal</label>
                            <input type="number" class="form-control form-control-user" id="product_price_price" placeholder="00.00">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Precio de oferta</label>
                            <input type="number" class="form-control form-control-user" id="product_price_offer" placeholder="00.00">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="resetPrices();">Cancelar</button>
                <a class="btn btn-primary" onclick="saveProductPrice();">Registrar</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="imagesProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" id="product_image_product_id" value="0">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imágenes del producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row my-4 ml-1">
                    <div class="col-9">
                        <input type="file" id="product_images_file" value="Subir imagen">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary btn-sm" onclick="uploadImage()">Subir</button>
                    </div>
                </div>
                <div class="row" id="product_images_container"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Listo</button>
            </div>
        </div>
    </div>
</div>-->