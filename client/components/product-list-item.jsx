import React from 'react';

function ProductListItem(props) {
  return (
    <div className="card col-3 mx-2 my-2">
      <img src={props.productData.image} className="img-fluid my-2"></img>
      <div className="font-weight-bold my-1">{props.productData.name}</div>
      <div className="my-1">${(props.productData.price * 0.01).toFixed(2)}</div>
      <div className="my-1">{props.productData.shortDescription}</div>
    </div>
  );
}

export default ProductListItem;
