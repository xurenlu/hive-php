#cd hive
for i in `find ./ -name "*.thrift"`
do
cp ${i} ~/thrift/
done
