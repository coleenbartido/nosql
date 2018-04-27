using MongoDB.Bson;
using MongoDB.Driver;
using MongoDB.Driver.Builders;
using NoSQL.App_Start;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace NoSQL.Controllers
{
    public class HomeController : Controller
    {

        MongoContext _dbContext;
        // GET: UserAccount

        public HomeController()
        {
            _dbContext = new MongoContext();
        }

        public ActionResult Index()
        {
            return View();
        }

        public ActionResult HomePage()
        {
            var userID = 2;
            var document = _dbContext._database.GetCollection<BsonDocument>("FollowingList");
            var query = Query.And(Query.EQ("UserID", userID));
            var list = document.Find(query);
            
            foreach(var a in list)
            {
                var name = a.GetValue("Following");

            }

            //var document = _dbContext._database.GetCollection<BsonDocument>("");

            return View("About");
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
    }
}