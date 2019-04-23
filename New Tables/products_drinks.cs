using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tinders
{
    #region Products_drinks
    public class Products_drinks
    {
        #region Member Variables
        protected int _id;
        protected string _name_product;
        protected int _amount_product;
        protected int _price_product;
        protected int _sold_product;
        protected int _revenue;
        #endregion
        #region Constructors
        public Products_drinks() { }
        public Products_drinks(string name_product, int amount_product, int price_product, int sold_product, int revenue)
        {
            this._name_product=name_product;
            this._amount_product=amount_product;
            this._price_product=price_product;
            this._sold_product=sold_product;
            this._revenue=revenue;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name_product
        {
            get {return _name_product;}
            set {_name_product=value;}
        }
        public virtual int Amount_product
        {
            get {return _amount_product;}
            set {_amount_product=value;}
        }
        public virtual int Price_product
        {
            get {return _price_product;}
            set {_price_product=value;}
        }
        public virtual int Sold_product
        {
            get {return _sold_product;}
            set {_sold_product=value;}
        }
        public virtual int Revenue
        {
            get {return _revenue;}
            set {_revenue=value;}
        }
        #endregion
    }
    #endregion
}