import React from 'react';

class ProductDetails extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      product: null
    };
  }

  componentDidMount() {
    fetch('/api/products.php?id=' + this.props.viewParams.id)
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
    if (this.state.product === null) {
      return null;
    } else {
      return (
        <div className="container col-12 text">
          <div onClick={() => {
            this.props.setView('catalog', {});
          }}>{this.props.backText}</div>
          <div className="row">
            <img src={this.state.product.image} className="col my-3"></img>
            <div className="col">
              <div className="row">
                <div className="col justify-content-start productName my-3">{this.state.product.name}</div>
              </div>
              <div className="row">
                <div className="col justify-content-start my-3">${(this.state.product.price * 0.01).toFixed(2)}</div>
              </div>
              <div className="row">
                <div className="col justify-content-start my-3">{this.state.product.shortDescription}</div>
              </div>
              <div className="row">
                <button className="col justify-content-start my-3" onClick={() => { this.props.addToCart(this.state.product); }}>{this.props.addText}</button>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col my-3">{this.state.product.longDescription}</div>
          </div>
        </div>
      );
    }
  }
}

export default ProductDetails;
