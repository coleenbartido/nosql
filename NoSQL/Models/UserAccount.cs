using MongoDB.Bson;
using MongoDB.Bson.Serialization.Attributes;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace NoSQL.Models
{
    public class UserAccount
    {
        [BsonId]

        public ObjectId Id { get; set; }

        [BsonElement("UserID")]
        public int UserID { get; set; }

        [BsonElement("Email")]
        public string Email { get; set; }

        [BsonElement("Password")]
        public string Password { get; set; }

    }
}