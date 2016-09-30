# hashbreak

## Is decryption of md5, sha1 or sha256 possible?

Simply the answer would be no. These are <strong>not encryption</strong>, these are hashing and it is one way process. An md5 is always 128 bits long. That means that there are 2 <sup>128</sup> possible MD5 hashes. That is a reasonably large number. Also, several different inputs can result in same output. So going back to the input from the input is <strong>almost</strong> impossible. And sha1 and sha256 are even more extremely secure.

## So how to break these level of security?

People do not usually set passwords which are random or semi random strings. Most of the passwords consist of meaningful words, names, favorite fictional characters etc. Permutation of those results in a very limited number. Which gives possibility of duplicate passwords. You can even go to the internet and find there is a list of common passwords.

Now the idea is, first I have implemented a hashing system. And for each hashing I have made the system to store the result. After a large number of usage, there will be a good database consisting of so many input output pair. Now by implementing a good searching algorithm, retrieval of data can be done. 

## Storing the data:

Whenever an input is made, first the hashed value is searched in the database. If not found, then only the new value is added to the database. One important point to notice here is, one hashed value may refer to multiple key. As a result obtaining only one key will meet our goal. Although probability of finding such a match is very low, but still making the hashed value unique would be a good idea.

## Online Link:

This system is currently uploaded online and can be found on <a href="http://www.hashbreak.esy.es">http://www.hashbreak.esy.es</a> 

## Article Link:

Will be available very soon
