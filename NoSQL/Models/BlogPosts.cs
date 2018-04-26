using MongoDB.Bson;
using MongoDB.Bson.Serialization.Attributes;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace NoSQL.Models
{
    public class BlogPosts
    {
        [BsonId]

        public ObjectId Id { get; set; }

        [BsonElement("BlogPostID")]
        public int BlogPostID { get; set; }


    }
}