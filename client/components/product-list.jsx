import React from 'react';
import ProductListItem from './product-list-item';

class ProductList extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      products: []
    };
    this.getProducts = this.getProducts.bind(this);
  }
  componentDidMount() {
    this.getProducts();
  }
  getProducts() {
    fetch('/api/products.php')
      .then(response => {
        return response.json();
      })
      .then(data => {
        this.setState({
          products: data
        });
      });
  }
  render() {
    return (
      <div className="row justify-content-center">
        {this.state.products.map(product => {
          return (
            <ProductListItem key={product.id} productData={product}/>
          );
        })}
      </div>
    );
  }
}

export default ProductList;
