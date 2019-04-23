using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tinders
{
    #region Dailyreports
    public class Dailyreports
    {
        #region Member Variables
        protected int _id;
        protected unknown _day;
        protected int _profit;
        protected int _revenue;
        #endregion
        #region Constructors
        public Dailyreports() { }
        public Dailyreports(unknown day, int profit, int revenue)
        {
            this._day=day;
            this._profit=profit;
            this._revenue=revenue;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual unknown Day
        {
            get {return _day;}
            set {_day=value;}
        }
        public virtual int Profit
        {
            get {return _profit;}
            set {_profit=value;}
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