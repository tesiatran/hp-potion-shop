import React from 'react';

function CartSummaryItem(props) {
  return (
    <div className="container col-12 text">
      <div className="card col-6 d-block mx-auto">
        <div className="row">

          <div className="col">
            <img src={props.cartItemData.image} className="card-img"></img>
          </div>

          <div className="col">
            <div className="card-body">
              <div className="card-title justify-content-start productName my-3">{props.cartItemData.name}</div>
              <div className="card-text justify-content-start my-3">${(props.cartItemData.price * 0.01).toFixed(2)}</div>
              <div className="card-text justify-content-start my-3">{props.cartItemData.shortDescription}</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  );
}

export default CartSummaryItem;
