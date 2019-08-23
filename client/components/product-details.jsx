import React from 'react';

class ProductDetails extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      product: null
    };
  }

  componentDidMount() {
    fetch('/api/products.php?id=1')
      .then(response => {
        return response.json();
      })
      .then(data => {
        this.setState({
          product: data
        });
      });
  }

  render() {
    return null;
  }
}

export default ProductDetails;
