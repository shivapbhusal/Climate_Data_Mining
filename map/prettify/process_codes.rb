#!/usr/bin/env ruby

# country codes:
# http://en.wikipedia.org/wiki/ISO_3166-1

require 'rubygems'
require 'nokogiri'
require 'csv'

filename = ARGV[0]
header = ["name","2code","3code","numeric","iso"]
rows = []

f = File.open(filename)
doc = Nokogiri::HTML(f)
f.close

doc.css('tr').each do |tr|
	row = []
	tr.css('td').each do |cell|
		row << cell.text
	end
	rows << row
end

CSV.open("country-codes.csv", "wb") do |csv|
	csv << header
	rows.each do |row|
		csv << row
	end
end