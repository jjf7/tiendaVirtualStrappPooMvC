<div id="mobile-menu" class="drawer d-flex flex-column">
    <div class="drawer-close">
        <a id="mobile-menu-hide" class="mdi mdi-close mdi-18px btn-icon-sm mdi-light" style="background:none; border:none"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Cerrar</a>
    </div>
    <div class="drawer-menu-section p-0"> <span class="title">Carrito de compras</span></div>
    <div class="drawer-brand-section m-0">
        <ul class="links">
            <li>
                <a  href="<?=URL_PROJECT?>checkout" id="checkOut"  title="Checkout" style="font: 600 14px/36px  !important; cursor: pointer;"  > <i class="fas fa-credit-card" aria-hidden="true"></i> Comprar  </a>
            </li>
            <li>
                <a  id="emptyShoppingCart" class="border-0"  style="font: 600 14px/36px  !important; cursor: pointer;"  title="Vaciar el carro"> 
					<i class="fas fa-trash" aria-hidden="true"></i>  Vaciar Carrito
                </a>
            </li>
        </ul>
    </div>
   
    <div class="drawer-menu-section p-0" id="titleShoppinCart"> <span class="title">Productos</span></div>

    <div id="shoppingCartList" class="p-2 drawer-menu-section nav-scroll flex-grow-1 flex-shrink-1" ></div>
	
	
    <div class="drawer-footer">
        <div class="row">
            <div class="col-4">Sub total</div>
            <div class="col-8 price">$ <span id="subtotal">0.00</span></div>
            <div class="col-4">Envío</div>
            <div class="col-8 price">$ 0.00</div>
          
            <div class="col-4"><b>Total</b></div>
            <div class="col-8 price">$ <span id="total">0.00</span></div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <script src="<?=URL_PROJECT?>js/app.js"></script>

<div  style="position: absolute;  bottom: 0; width: 100%;">
<center><a class="font-weight-bold"  href="<?=URL_PROJECT?>developer">- Desarrollado Por -</a></center>
</div>
</body>
</html>