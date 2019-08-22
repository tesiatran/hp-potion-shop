import React from 'react';

function ProductListItem(props) {
  return (
    <div>
      {props.productData.map(product => {
        return (
          <div key={product.id} className="card col">
            <div>{product.image}</div>
            <div>{product.name}</div>
            <div>{product.price}</div>
            <div>{product.shortDescription}</div>
          </div>
        );
      })};
    </div>
  );
}

export default ProductListItem;
